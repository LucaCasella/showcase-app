import React, {useContext, useState} from 'react';
import {LanguageContext} from "../language_context/LanguageProvider";

function WorkWithUs() {
    const {languageData} = useContext(LanguageContext);
    const [fileName, setFileName] = useState('');

    const handleFileChange = (e: any) => {
        if (e.target.files.length > 0) {
            setFileName(e.target.files[0].name);
        }
    };

    return (
        <div className='max-w-7xl mx-auto'>
            <div className='m-4'>
                <h2 className='text-4xl lg:text-6xl text-center tracking-widest font-semibold mt-10'>{languageData.workWithUs.title}</h2>
                <p className='max-w-2xl mx-auto text-md lg:text-xl text-center tracking-widest leading-normal lg:leading-10 font-medium ml-20 my-10'>
                    {languageData.workWithUs.description}
                </p>

                <div className='flex flex-col lg:flex-row gap-10 my-20'>
                    <div className='lg:w-2/3 flex flex-col'>
                        <span className='w-1/4 h-[1px] bg-black'/>
                        <form action=""
                              className='flex flex-col gap-16 p-5 border-1 border-y-transparent border-x-black'>
                            <input type="text"
                                   className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                   placeholder={languageData.utils.form.name}/>
                            <input type="email"
                                   className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                   placeholder={languageData.utils.form.email}/>
                            <input type="tel"
                                   className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                   placeholder={languageData.utils.form.phone}/>
                            <textarea name="message"
                                      id="contact-message"
                                      className='h-32 min-h-20 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                      placeholder={languageData.utils.form.message}
                            />
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
                            </div>
                            <div className='flex gap-4 items-center'>
                                <input type="checkbox" className='w-6 h-6'/>
                                <p className='my-auto'>
                                    {languageData.utils.form.privacy1}<a href="">{languageData.utils.form.privacy2}</a>{languageData.utils.form.privacy3}
                                </p>
                            </div>
                            <button type='submit' className='w-full md:w-1/2 mx-auto font-normal border p-2'>{languageData.utils.form.submit}
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
