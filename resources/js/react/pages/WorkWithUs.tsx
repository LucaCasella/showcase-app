import React, {useState} from 'react';
import {Check} from "lucide-react";

function WorkWithUs() {
    const [fileName, setFileName] = useState('');

    const handleFileChange = (e: any) => {
        if (e.target.files.length > 0) {
            setFileName(e.target.files[0].name);
        }
    };

    return (
        <div className='max-w-7xl mx-auto'>
            <h2 className='text-6xl text-start tracking-widest font-semibold my-20'>Entra nel team</h2>
            <p className='max-w-2xl mx-auto text-2xl text-center tracking-widest font-medium ml-20 my-20'>
                Siamo sempre alla ricerca di talenti appassionati e motivati. Se vuoi entrare a far parte del nostro
                team, inviaci la tua candidatura e raccontaci cosa ti rende speciale.
            </p>

            <div className='flex flex-col lg:flex-row gap-10 my-20'>
                <div className='lg:w-2/3 flex flex-col'>
                    <span className='w-1/4 h-[1px] bg-black'/>
                    <form action="" className='flex flex-col gap-16 p-5 border-1 border-y-transparent border-x-black'>
                        <input type="text"
                               className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                               placeholder='Il tuo nome'/>
                        <input type="email"
                               className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                               placeholder='La tua email'/>
                        <input type="tel"
                               className='text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                               placeholder='Un tuo numero'/>
                        <textarea name="message"
                                  id="contact-message"
                                  className='h-32 min-h-20 text-center border-none border-bottom focus:outline-none focus:ring-0 placeholder:text-black placeholder:text-center placeholder:tracking-widest placeholder:text-lg'
                                  placeholder='Il tuo messaggio'
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
                                Carica un cv.
                            </label>
                            {fileName && <span>{fileName}</span>}
                        </div>
                        <div className='flex gap-4 items-center'>
                            <input type="checkbox" className='w-6 h-6'/>
                            {/*<label className="self-start flex items-center cursor-pointer">*/}
                            {/*    <input*/}
                            {/*        type="checkbox"*/}
                            {/*        className="peer hidden"*/}
                            {/*    />*/}
                            {/*    <div*/}
                            {/*        className="w-6 h-6 border peer-checked:bg-slate-700 transition"*/}
                            {/*    >*/}
                            {/*        <Check color='white'/>*/}
                            {/*    </div>*/}
                            {/*</label>*/}
                            <p className='my-auto'>
                                Ho letto e accetto l’<a href="">Informativa sulla Privacy</a>, acconsentendo al
                                trattamento dei miei dati personali.
                            </p>
                        </div>
                        <button type='submit' className='w-1/2 mx-auto font-normal border p-2'>INVIA
                        </button>
                    </form>
                    <span className='w-1/4 h-[1px] bg-black self-end'/>
                </div>

                <div className='lg:w-1/3 flex flex-col'>
                    <div className='lg:h-1/2'>
                        <p>
                            Lo Studio Anastasia Kabakova è una realtà innovativa e digitale del settore matrimoniale.
                            Gli
                            importanti investimenti realizzati negli ultimi anni rispecchiano la crescente attenzione
                            rivolta alla ricerca, all'innovazione e alla sostenibilità in tutte le sue attività.
                            Crediamo che persone qualificate e in grado di accogliere le sfide del mercato possano
                            contribuire con successo allo sviluppo dello Studio. Per questa ragione, investiamo nella
                            scelta
                            di persone dinamiche, brillanti, global mindset, con un approccio digitale e aperte al
                            cambiamento.
                        </p>
                    </div>

                    <div className='lg:h-2/2'>
                        <h5>Chi cerchiamo e perché sceglierci</h5>
                        <p>
                            Ricerchiamo persone con cui condividere la nostra mission e i nostri valori per attuare un
                            progetto di contenuti sempre più emozionanti e tecnologicamente avanzati, anche attraverso
                            iniziative di Employer Branding, eventi di orientamento al lavoro e Recruiting/Job Day, in
                            collaborazione con location del settore.
                            Attenti ai nuovi talenti, valorizziamo le nostre persone promuovendone la crescita nelle
                            aree
                            tecniche, professionali e manageriali, nel rispetto del work-life integration.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default WorkWithUs;
