import React, {useContext, useState} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";
import ReCAPTCHA from "react-google-recaptcha";
import SuccessNotification from "../components/notificationRequest/SuccessNotification";
import ErrorNotification from "../components/notificationRequest/ErrorNotification";
import axiosInstance, {tokenSPAVerify} from "../api/axios";
import {apiUrl} from "../constant/api-url";
import PrivacyModal from "../components/modal/PrivacyModal";

function WorkWithUs() {
    const {languageData} = useContext(LanguageContext);
    const [successMessage, setSuccessMessage] = useState("");
    const [errorMessage, setErrorMessage] = useState("");
    const [fileName, setFileName] = useState('');
    const [formData, setFormData] = useState({
        name: "",
        email: "",
        phone: "",
        comment: "",
        privacy: false,
        recaptcha: null,
        file: null
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
        file: (value: File | null) => {
            if (!value) {
                return languageData.contactFormError.file;
            }
            if (value.type !== "application/pdf") {
                return languageData.contactFormError.fileType;
            }
            if (value.size > 2 * 1024 * 1024) {
                return languageData.contactFormError.fileSize;
            }
            return null;
        }
    };
    const handleChange = (field: keyof typeof formData, value: any) => {
        setFormData(prev => ({ ...prev, [field]: value }));
        // @ts-ignore
        setErrors(prev => ({ ...prev, [field]: validations[field](value) }));
    };
    const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        if (e.target.files && e.target.files.length > 0) {
            const file = e.target.files[0];

            handleChange("file", file);

            if (!validations.file(file)) {
                setFileName(file.name);
            } else {
                setFileName('');
            }
        }
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

                const response = await axiosInstance.post(apiUrl.publicUrl.submitCurriculum, formData, {
                    headers: {
                        "Authorization": token,
                    },
                });
                // todo: add honeypot input
                if (response.data.success) {
                    setSuccessMessage(languageData.requestNotify.success);

                    setFormData({
                        name: "",
                        email: "",
                        phone: "",
                        comment: "",
                        privacy: false,
                        recaptcha: null,
                        file: null
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
                <h2 className='text-4xl lg:text-6xl text-center tracking-widest font-semibold mt-10'>{languageData.workWithUs.title}</h2>
                <p className='max-w-2xl mx-auto text-md lg:text-xl text-center tracking-widest leading-normal lg:leading-10 font-medium ml-20 my-10'>
                    {languageData.workWithUs.description}
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
                                <input type="text" id="middle_name_wwu" name="middle_name_wwu"
                                       style={{display: 'none'}}/>
                            </div>

                            <div>
                                <input type="text"
                                       className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                       placeholder={languageData.utils.form.name}
                                       value={formData.name}
                                       onChange={(e) => handleChange("name", e.target.value)}/>
                                {errors.name &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.name}</p>}
                            </div>

                            <div>
                                <input type="email"
                                       className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                       placeholder={languageData.utils.form.email}
                                       value={formData.email}
                                       onChange={(e) => handleChange("email", e.target.value)}/>
                                {errors.email &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.email}</p>}
                            </div>

                            <div>
                                <input type="tel"
                                       className='w-full text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                       placeholder={languageData.utils.form.phone}
                                       value={formData.phone}
                                       onChange={(e) => handleChange("phone", e.target.value)}/>
                                {errors.phone &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.phone}</p>}
                            </div>

                            <div>
                                <textarea name="comment"
                                          id="contact-message"
                                          className='w-full h-32 min-h-20 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                          placeholder={languageData.utils.form.message}
                                          value={formData.comment}
                                          onChange={(e) => handleChange("comment", e.target.value)}/>
                                {errors.comment &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.comment}</p>}
                            </div>

                            <div className="w-full flex flex-col items-center space-x-2 self-center">
                                <input
                                    id="file-upload"
                                    type="file"
                                    className="hidden"
                                    onChange={handleFileChange}
                                />
                                <label
                                    htmlFor="file-upload"
                                    className="cursor-pointer px-4 py-2 font-normal border hover:bg-slate-700 hover:text-white transition ease-in-out duration-300"
                                >
                                    {languageData.workWithUs.cvUpload}
                                </label>
                                {fileName && <span>{fileName}</span>}
                                {errors.file &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.file}</p>}
                            </div>

                            <div>
                                <div className='flex gap-4 items-center'>
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
                                    </div>
                                </div>
                                {errors.privacy &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.privacy}</p>
                                }
                            </div>

                            <div className='self-center'>
                                <ReCAPTCHA
                                    sitekey="6LccrpYpAAAAAGcl7WBDiRWSkDNbOgGZvFefjFYb"
                                    onChange={(value) => handleChange("recaptcha", value)}
                                />
                                {errors.recaptcha &&
                                    <p className="text-red-500 mt-2 mb-0 justify-self-center">{errors.recaptcha}</p>}
                            </div>

                            <button type='submit'
                                    className='w-full md:w-1/2 mx-auto font-normal border p-2'>{languageData.utils.form.submit}
                            </button>
                        </form>
                        <span className='w-1/4 h-[1px] bg-black self-end'/>
                    </div>

                    <div className='lg:w-1/3 flex flex-col'>
                        <div className='lg:h-1/2'>
                            <p>
                                {languageData.workWithUs.text1}
                            </p>
                        </div>

                        <div className='lg:h-2/2'>
                            <h5>{languageData.workWithUs.title2}</h5>
                            <p>
                                {languageData.workWithUs.text2}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default WorkWithUs;
