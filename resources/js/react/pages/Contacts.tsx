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
            <div className='m-4'>
                <h2 className='text-4xl lg:text-6xl text-center lg:text-start tracking-widest font-semibold mt-10'>{languageData.contacts.title}</h2>
                <p className='max-w-2xl mx-auto text-md lg:text-xl text-center tracking-widest leading-normal lg:leading-10 font-medium ml-20 my-10'>
                    {languageData.contacts.description}
                </p>
                {successMessage &&
                    <SuccessNotification message={successMessage} onClose={() => setSuccessMessage("")}/>}
                {errorMessage && <ErrorNotification message={errorMessage} onClose={() => setErrorMessage("")}/>}
                <div className='flex flex-col lg:flex-row gap-10 my-20'>
                    <div className='lg:w-2/3 flex flex-col'>
                        <span className='w-1/4 h-[1px] bg-black'/>
                        <form onSubmit={handleSubmit}
                              className='flex flex-col gap-8 lg:gap-16 p-5 border-1 border-y-transparent border-x-black'>
                            <div className='hidden'>
                                <input type="text" id="middle_name_cnt" name="middle_name_cnt" style={{ display: 'none' }} />
                            </div>

                            <div>
                                <input
                                    type="text"
                                    className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                    placeholder={languageData.utils.form.name}
                                    value={formData.name}
                                    onChange={(e) => handleChange("name", e.target.value)}
                                />
                                {errors.name &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.name}</p>}
                            </div>

                            <div>
                                <input
                                    className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
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
                                    className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
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
                                    className='w-full h-32 min-h-20 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
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
                                        className='w-6 h-6'
                                        onChange={(e) => handleChange("privacy", e.target.checked)}
                                    />
                                    <div className='my-auto'>
                                        {languageData.utils.form.privacy1}
                                        <a href="" onClick={openModal}>
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
                                    className='w-full sm:w-1/2 mx-auto font-normal border-1 border-slate-700 p-2'>
                                {languageData.utils.form.submit}
                            </button>
                        </form>
                        <span className='w-1/4 h-[1px] bg-black self-end'/>
                    </div>

                    <div className='lg:w-1/3 flex flex-col gap-10 items-center lg:items-end justify-between text-2xl'>
                        <div className='flex flex-col items-center lg:items-end gap-10'>
                            <div className=''>{languageData.contacts.followUs}</div>
                            <div className='flex flex-row sm:flex-col gap-4'>
                                <a href="">
                                    {/* todo: high - add link to facebook */}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px"
                                         height="48px">
                                    <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/>
                                        <path fill="#fff"
                                              d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/anastasiakabakova_fotografa/">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px"
                                         height="48px">
                                        <radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stopColor="#fd5"/>
                                            <stop offset=".328" stopColor="#ff543f"/>
                                            <stop offset=".348" stopColor="#fc5245"/>
                                            <stop offset=".504" stopColor="#e64771"/>
                                            <stop offset=".643" stopColor="#d53e91"/>
                                            <stop offset=".761" stopColor="#cc39a4"/>
                                            <stop offset=".841" stopColor="#c837ab"/>
                                        </radialGradient>
                                        <path fill="url(#yOrnnhliCrdS2gy~4tD8ma)"
                                              d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/>
                                        <radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813"
                                                        gradientTransform="matrix(1 0 0 .6663 0 1.849)"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stopColor="#4168c9"/>
                                            <stop offset=".999" stopColor="#4168c9" stopOpacity="0"/>
                                        </radialGradient>
                                        <path fill="url(#yOrnnhliCrdS2gy~4tD8mb)"
                                              d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/>
                                        <path fill="#fff"
                                              d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"/>
                                        <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"/>
                                        <path fill="#fff"
                                              d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"/>
                                    </svg>
                                </a>
                                <a href="">
                                    {/* todo: high - add link to youtube */}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px"
                                         height="48px">
                                        <path fill="#FF3D00"
                                              d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"/>
                                        <path fill="#FFF" d="M20 31L20 17 32 24z"/>
                                    </svg>
                                </a>
                            </div>
                            <a href="https://www.matrimonio.com/fotografo-matrimonio/anastasia-kabakova--e308307">
                                <img src='/assets/seal_bodas_it_IT.png' alt='matimonio.com'/>
                            </a>
                        </div>
                        <a href="tel:+3803797287" className='no-underline text-black'>
                            <div className='flex flex-col items-center lg:items-end gap-2'>
                                <div>{languageData.contacts.callUs}</div>
                                <div>380{' '}3797287</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Contacts;
