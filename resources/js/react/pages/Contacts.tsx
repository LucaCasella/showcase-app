import React, {useContext, useState} from 'react';
import ReCAPTCHA from "react-google-recaptcha";
import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import SuccessNotification from "../components/notificationRequest/SuccessNotification";
import ErrorNotification from "../components/notificationRequest/ErrorNotification";
import {LanguageContext} from "../language_context/LanguageProvider";



const Contacts = () => {
    const {languageData} = useContext(LanguageContext)
    const [successMessage, setSuccessMessage] = useState("");
    const [errorMessage, setErrorMessage] = useState("");
    const [formData, setFormData] = useState({
        name: "",
        email: "",
        phone: "",
        comment: "",
        privacy: false,
        recaptcha: null,
    });



    const [errors, setErrors] = useState<{ [key in keyof typeof formData]?: string }>({});

    const validations = {
        name: (value: string) => !value.trim() ? languageData.contactFormError.name : value.length < 3 ? languageData.contactFormError.hintName: null,
        email: (value: string) => !value.trim() ? languageData.contactFormError.email : !/^\S+@\S+\.\S+$/.test(value) ? languageData.contactFormError.hintEmail : null,
        phone: (value: string) => !value.trim() ? languageData.contactFormError.phone : !/^\+?[0-9]{8,15}$/.test(value) ? languageData.contactFormError.hintPhone : null,
        comment: (value: string) => !value.trim() ? languageData.contactFormError.comment : value.length < 10 ? languageData.contactFormError.hintComment : null,
        privacy: (value: boolean) => !value ? languageData.contactFormError.privacy : null,
        recaptcha: (value: string | null) => !value ? languageData.contactFormError.captcha : null,
    };

    const handleChange = (field: keyof typeof formData, value: any) => {
        setFormData(prev => ({ ...prev, [field]: value }));
        // @ts-ignore
        setErrors(prev => ({ ...prev, [field]: validations[field](value) }));
    };

    const validateForm = () => {
        let valid = true;
        const newErrors: typeof errors = {};

        Object.entries(validations).forEach(([field, validate]) => {
            // @ts-ignore
            const error = validate(formData[field as keyof typeof formData]);
            if (error) {
                newErrors[field as keyof typeof errors] = error;
                valid = false;
            }
        });

        setErrors(newErrors);
        return valid;
    };

    const handleSubmit = async (e: React.FormEvent) => {

        e.preventDefault();

        if (validateForm()) {
            try {
                const token = await tokenSPAVerify()

                const response = await axiosInstance.post(apiUrl.publicUrl.submitContact, formData, {
                    headers: {
                        "Authorization": token,
                    },
                });

                if(response.data.success){
                    setSuccessMessage(languageData.requestNotify.success);

                    setFormData({
                        name: "",
                        email: "",
                        phone: "",
                        comment: "",
                        privacy: false,
                        recaptcha: null,
                    });
                }

            } catch (error: any) {
                setErrorMessage(languageData.requestNotify.error);
            }
        }
    };

    return (
        <div className='max-w-7xl mx-auto'>
            <h2 className='text-6xl text-start tracking-widest font-semibold my-20'>Contattaci</h2>
            <p className='max-w-2xl mx-auto text-2xl text-center tracking-widest font-medium ml-20 my-20'>
                Scrivici un messaggio se hai bisogno di aiuto o anche solo per dirci la tua
            </p>
            {successMessage && <SuccessNotification message={successMessage} onClose={() => setSuccessMessage("")} />}
            {errorMessage && <ErrorNotification message={errorMessage} onClose={() => setErrorMessage("")} />}
            <div className='flex flex-col lg:flex-row gap-10 my-20'>
                <div className='lg:w-2/3 flex flex-col'>
                    <span className='w-1/4 h-[1px] bg-black' />
                    <form onSubmit={handleSubmit} className='flex flex-col gap-20 p-5 border-1 border-y-transparent border-x-black'>
                        <div>
                            <div>
                                <input
                                    type="text"
                                    className='w-[100%] min-h-20 mx-auto mt-2 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest'
                                    placeholder='Il tuo nome'
                                    value={formData.name}
                                    onChange={(e) => handleChange("name", e.target.value)}
                                />
                                {errors.name && <p className="text-red-500">{errors.name}</p>}
                            </div>
                            <div>
                                <input
                                    className='w-[100%] min-h-20 mx-auto mt-2 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest'
                                    placeholder='La tua email'
                                    type="email"
                                    value={formData.email}
                                    onChange={(e) => handleChange("email", e.target.value)}
                                />
                                {errors.email && <p className="text-red-500">{errors.email}</p>}
                            </div>
                            <div>
                                <input
                                    className='w-[100%] min-h-20 mx-auto mt-2 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest'
                                    placeholder='Un tuo numero'
                                    type="tel"
                                    value={formData.phone}
                                    onChange={(e) => handleChange("phone", e.target.value)}
                                />
                                {errors.phone && <p className="text-red-500">{errors.phone}</p>}
                            </div>
                            <textarea
                                id="contact-message"
                                className='w-[100%] mx-auto mt-2 min-h-20 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest'
                                placeholder='Il tuo messaggio'
                                value={formData.comment}
                                onChange={(e) => handleChange("comment", e.target.value)}
                            />
                            {errors.comment && <p className="text-red-500">{errors.comment}</p>}
                        </div>
                        <div className='w-1/2'>
                            <label>
                                <input
                                    type="checkbox"
                                    checked={formData.privacy}
                                    onChange={(e) => handleChange("privacy", e.target.checked)}
                                />
                                Accetto la privacy policy
                            </label>
                            {errors.privacy && <p className="text-red-500">{errors.privacy}</p>}
                        </div>
                        <div>
                            <ReCAPTCHA
                                sitekey="6LccrpYpAAAAAGcl7WBDiRWSkDNbOgGZvFefjFYb"
                                onChange={(value) => handleChange("recaptcha", value)}
                            />
                            {errors.recaptcha && <p className="text-red-500">{errors.recaptcha}</p>}
                        </div>
                        <button type='submit' className='w-1/2 mx-auto border border-[#DEE2E6] p-2'>
                            INVIA MESSAGGIO
                        </button>
                    </form>
                    <span className='w-1/4 h-[1px] bg-black self-end' />
                </div>

                <div className='lg:w-1/2 flex flex-col items-end justify-between text-2xl'>
                    <div className='flex flex-col items-end gap-10'>
                        <div className=''>SEGUICI SU</div>
                        <div>Facebook</div>
                        <div>Instagram</div>
                        <div>YouTube</div>
                        <div>Matrimonio.com</div>
                    </div>

                    <div className='flex flex-col items-end gap-2'>
                        <div>Puoi chiamarci al numero</div>
                        <div>3803797287</div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Contacts;
