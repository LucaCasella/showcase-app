import React, {useContext, useState} from 'react';
import ReCAPTCHA from "react-google-recaptcha";
import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import SuccessNotification from "../components/notificationRequest/SuccessNotification";
import ErrorNotification from "../components/notificationRequest/ErrorNotification";
import {LanguageContext} from "../language_context/LanguageProvider";
import PrivacyModal from "../components/modal/PrivacyModal";

const Contacts = () => {
    const {languageData} = useContext(LanguageContext);
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
    const [isModalOpen, setModalOpen] = useState(false);


    const openModal = (e: any) => {
        e.preventDefault();
        window.scrollTo({top: 0 , behavior: "smooth"})
        setModalOpen(true);
    };

    const [errors, setErrors] = useState<{ [key in keyof typeof formData]?: string }>({});

    const validations = {
        name: (value: string) => !value.trim() ? languageData.contactFormError.name : value.length < 3 ? languageData.contactFormError.hintName : null,
        email: (value: string) => !value.trim() ? languageData.contactFormError.email : !/^\S+@\S+\.\S+$/.test(value) ? languageData.contactFormError.hintEmail : null,
        phone: (value: string) => !value.trim() ? languageData.contactFormError.phone : !/^\+?[0-9]{8,15}$/.test(value) ? languageData.contactFormError.hintPhone : null,
        comment: (value: string) => !value.trim() ? languageData.contactFormError.comment : value.length < 10 ? languageData.contactFormError.hintComment : null,
        privacy: (value: boolean) => !value ? languageData.contactFormError.privacy : null,
        recaptcha: (value: string | null) => !value ? languageData.contactFormError.captcha : null,
    };

    const handleChange = (field: keyof typeof formData, value: any) => {
        setFormData(prev => ({...prev, [field]: value}));
        // @ts-ignore
        setErrors(prev => ({...prev, [field]: validations[field](value)}));
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

                if (response.data.success) {
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
            <div className='flex flex-col justify-center items-center m-4'>
                <h2 className='text-2xl md:text-4xl text-center tracking-widest mt-10'>{languageData.contacts.title}</h2>
                <p className='libre-baskerville max-w-2xl text-md lg:text-xl text-center tracking-widest leading-normal lg:leading-10 font-medium my-10'>
                    {languageData.contacts.description}
                </p>
                {successMessage &&
                    <SuccessNotification message={successMessage} onClose={() => setSuccessMessage("")}/>}
                {errorMessage && <ErrorNotification message={errorMessage} onClose={() => setErrorMessage("")}/>}
                <div className='w-full flex flex-col items-center gap-10 my-20'>
                    <div className='w-full lg:w-2/3 flex flex-col m-4'>
                        <span className='w-1/4 h-[1px] bg-black'/>
                        <form onSubmit={handleSubmit}
                              className='flex flex-col gap-8 lg:gap-16 p-10 border border-y-transparent border-x-black'>
                            <div className='hidden'>
                                <input type="text" id="middle_name_cnt" name="middle_name_cnt" style={{ display: 'none' }} />
                            </div>

                            <div>
                                <input
                                    type="text"
                                    className='w-full text-center border-t-0 border-l-0 border-r-0 border-gray-300 focus:outline-none focus:border-b-black focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                    placeholder={languageData.utils.form.name}
                                    value={formData.name}
                                    onChange={(e) => handleChange("name", e.target.value)}
                                />
                                {errors.name &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.name}</p>}
                            </div>

                            <div>
                                <input
                                    className='w-full text-center border-t-0 border-l-0 border-r-0 border-gray-300 focus:outline-none focus:border-b-black focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                    placeholder={languageData.utils.form.email}
                                    type="email"
                                    value={formData.email}
                                    onChange={(e) => handleChange("email", e.target.value)}
                                />
                                {errors.email &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.email}</p>}
                            </div>

                            <div>
                                <input
                                    className='w-full text-center border-t-0 border-l-0 border-r-0 border-gray-300 focus:outline-none focus:border-b-black focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                    placeholder={languageData.utils.form.phone}
                                    type="tel"
                                    value={formData.phone}
                                    onChange={(e) => handleChange("phone", e.target.value)}
                                />
                                {errors.phone &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.phone}</p>}
                            </div>

                            <div>
                                <textarea
                                    id="contact-message"
                                    className='w-full h-32 min-h-20 text-center border-t-0 border-l-0 border-r-0 border-gray-300 focus:outline-none focus:border-b-black focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                    placeholder={languageData.utils.form.message}
                                    value={formData.comment}
                                    onChange={(e) => handleChange("comment", e.target.value)}
                                />
                                {errors.comment &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.comment}</p>}
                            </div>

                            <div>
                                <div className='flex gap-4 items-center justify-center'>
                                    <input
                                        type="checkbox"
                                        checked={formData.privacy}
                                        className='w-6 h-6 hover:cursor-pointer'
                                        onChange={(e) => handleChange("privacy", e.target.checked)}
                                    />
                                    <div className='my-auto'>
                                        {languageData.utils.form.privacy1}
                                        <a
                                            href=""
                                            onClick={openModal}
                                            className='underline'
                                        >
                                            {languageData.utils.form.privacy2}
                                        </a>
                                        <PrivacyModal isOpen={isModalOpen} onClose={() => setModalOpen(false)} />
                                        {languageData.utils.form.privacy3}
                                    </div>
                                </div>
                                {errors.privacy &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.privacy}</p>}
                            </div>

                            <div className='self-center'>
                                <ReCAPTCHA
                                    sitekey="6LdGCJspAAAAAJ5uwkOWb3ADEsq4as6eFMpv8jgj"
                                    onChange={(value) => handleChange("recaptcha", value)}
                                />
                                {errors.recaptcha &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.recaptcha}</p>}
                            </div>

                            <button type='submit'
                                    className='w-full sm:w-1/2 mx-auto font-normal border p-2 hover:cursor-pointer'>
                                {languageData.utils.form.submit}
                            </button>
                        </form>
                        <span className='w-1/4 h-[1px] bg-black self-end'/>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Contacts;
