<?php

namespace App\Rules;

//use Http;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptchaEnterpriseRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = Http::asJson()->post($this->recaptchaEnterpriseVerificationUrl(), [
            'event' => [
                'token' => $value,
                'site_key' => $this->getSiteKey(),
            ]
        ]);

        return $response->json('tokenProperties.valid');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Unable to validate recaptcha token';
    }

    private function recaptchaEnterpriseVerificationUrl(): string
    {
        return "https://recaptchaenterprise.googleapis.com/v1/projects/{$this->getProjectId()}/assessments?key={$this->getApiKey()}";
    }

    private function getProjectId(): ?string
    {
        return config('services.recaptcha_ent.project_id');
    }

    private function getApiKey(): ?string
    {
        return config('services.recaptcha_ent.api_key');
    }

    public function getSiteKey(): ?string
    {
        return config('services.recaptcha_ent.site_key');
    }

}
