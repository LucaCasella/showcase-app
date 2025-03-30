<?php

namespace App\Http\Controllers;


use App\Mail\ContactMail;
use App\Mail\Notification;
use App\Models\Album;
use App\Models\Contact;
use App\Models\Photo;
use App\Rules\ReCaptchaEnterpriseRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Service\PlaceReviewsAPI\Facades\PlaceReviewsAPIFacades;

class ApiController extends Controller
{

    /**
     * This function generate a temporary token that allow SPA application
     *to perform request
     * @return JsonResponse
     */
    public function generateToken(): JsonResponse
    {
        $expiration = Carbon::now()->addSeconds(10);
        $data = [
            'exp' => $expiration->timestamp
        ];


        $token = Crypt::encrypt($data);

        return response()->json([
            'token' => $token
        ]);
    }

    /**
     * This method provide to the SPA Google review
     * @return JsonResponse
     */
    public function getGoogleReview(): JsonResponse
    {
        try {
            $reviews = PlaceReviewsAPIFacades::getReviews();
            if (!$reviews) {
                return response()->json(['error' => 'No reviews found'], status:404);
            }
            return response()->json($reviews);

        }catch (\Exception $exception){

            return response()->json(['error' => $exception->getMessage()], status:500);
        }

    }

    /**
     * This method allow SPA to store some information of contact by user's
     * that want it
     * @param Request $request
     * @return JsonResponse
     */
    public function submitContact(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'recaptcha' => ['required', new ReCaptchaEnterpriseRule]
            ]);

            if ($validator->fails()) {

                return response()->json(['captchaError' => $validator->errors()], 400);
            }

            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'comment' => $request->comment,
                'privacy_accepted' => 1
            ])->save;

           Mail::to('infokabakova@yahoo.com')->send(new Notification($request->name, $request->email, $request->phone, $request->comment));

           Mail::to($request->input('email'))->send(new ContactMail($request->name));

            return response()->json(['success' => true], 200);

        }catch (\Exception $e){

            return response()->json([$e->getMessage()], 500);
        }
    }

    public function submitCurriculum(Request $request): JsonResponse
    {
         try {
            $validator = Validator::make($request->all(), [
                'recaptcha' => ['required', new ReCaptchaEnterpriseRule],
                'pdf' => ['required', 'file', 'mimetypes:application/pdf', 'max:2048'],
                'email' => ['required', 'email'],
                'phone' => ['required'],
            ]);

            if ($validator->fails()) {

                return response()->json(['captchaError' => $validator->errors()], 400);
            }
//             Collaboration::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'phone' => $request->phone,
//                'privacy_accepted' => $request->privacycheck,
//                'curriculum' => PdfManagerFacade::storePdfFromRequest($request->file('pdf'), $request->name),
//            ])->save;

            return response()->json(['success', 'Request collaboration created successfully'] );

        }catch (\Exception $e){

            return response()->json(['error', $e->getMessage()], 500);
        }
    }


    /**
     * Retrieves all visible albums, optionally filtered by type.
     *
     * This method fetches all albums where the 'visible' field is set to 1.
     * If a 'type' query parameter is provided, it filters the albums by the given type.
     * If no albums are found, it returns an error response.
     *
     * @param Request $request The HTTP request containing optional query parameters.
     * @return JsonResponse A JSON response containing the albums or an error message.
     */
    public function getAllAlbums(Request $request): JsonResponse //todo: add a pagination
    {
        try {
            $query = Album::where('visible', '=', 1);

            if ($request->has('type')) {
                $query->where('type', $request->query('type'))->orderBy('created_at', 'desc');
            }

            $albums = $query->get();

            if ($albums->isEmpty()) {

                return response()->json(["message" => "No albums found"],status:404);
            }

            return response()->json($albums);

        } catch (\Exception $e){

            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * @param int $album_id
     * @return JsonResponse
     */
    public function getPhotosByAlbumId(int $album_id): JsonResponse
    {
        try {

            $photos = Photo::where('album_id', '=', $album_id)->get();

            if($photos->isEmpty()){

                return response()->json(["message" => "No photos found"],status:404);
            }

            return response()->json($photos);

        }catch (\Exception $e){

            return response()->json(['error' => $e->getMessage()]);
        }

    }

}
