import React from 'react';

const Contacts = () => {
    return (
        <div className='max-w-7xl mx-auto'>
            <h2 className='text-6xl text-start tracking-widest font-semibold my-20'>Contattaci</h2>
            <p className='max-w-2xl mx-auto text-2xl text-center tracking-widest font-medium ml-20 my-20'>
                Scivici un messaggio se hai bisogno di aiuto o anche solo per dirci la tua
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
                        <button type='submit' className='w-1/2 mx-auto font-normal border-1 border-slate-700 p-2'>INVIA
                            MESSAGGIO
                        </button>
                    </form>
                    <span className='w-1/4 h-[1px] bg-black self-end'/>
                </div>

                <div className='lg:w-1/3 flex flex-col items-end justify-between text-2xl'>
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
