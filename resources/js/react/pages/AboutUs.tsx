import React, {useState} from 'react';

function AboutUs() {
    const [activeImage, setActiveImage] = useState('');

    return (
        <div className='max-w-7xl mx-auto flex flex-col'>
            <h2 className='text-6xl text-center tracking-widest font-semibold mt-20'>La Mission</h2>
            <p className='max-w-1/2 text-2xl text-center tracking-widest font-medium my-10'>
                Mi chiamo Anastasia Kabakova, dopo anni di lavoro nel settore fotografico insieme al mio compagno Matteo
                decidiamo di aprire uno studio nostro.
                Ad oggi contiamo su una squadra tra fotografi e videomaker, formata dai migliori collaboratori con cui
                abbiamo avuto il piacere di lavorare.
                Innovazione, ricerca e sviluppo sono alla base del nostro metodo di lavoro.
                I nostri parchi macchine non raggiungono mai i tre anni di età, per noi è fondamentale rimanere sempre
                aggiornati in termini di qualità fotografica, video e attrezzatura.
                Con noi si inizia un percorso, dove ogni pacchetto viene cucito su misura del cliente, attenzione e cura
                delle richieste ed esigenze di esso sono capi saldi del nostro modo di lavorare.
            </p>

            <h2 className='text-6xl text-center tracking-widest font-semibold mt-20'>Chi Siamo</h2>
            <div className="relative flex mt-10 mb-20">
                {/* Immagine Sinistra */}
                <div
                    className="relative transition-all duration-300"
                    onMouseEnter={() => setActiveImage('left')}
                    onMouseLeave={() => setActiveImage('')}
                >
                    <img
                        src='https://placehold.co/600x400'
                        alt="Immagine sinistra"
                        className="h-[600px] w-[400px] object-cover"
                    />
                </div>

                {/* Area centrale per il testo */}
                <div className="relative h-96 flex-grow mx-4 bg-white overflow-hidden">
                    {/* Testo per immagine sinistra */}
                    <div className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'left' ? 'opacity-100' : 'opacity-0'}`}>
                        <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>Anastasia</p>
                        <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'left' ? 'translate-x-0' : '-translate-x-full'}`}>
                            Mi chiamo Anastasia Kabakova, dopo anni di lavoro nel settore fotografico insieme al mio
                            compagno Matteo decidiamo di aprire uno studio nostro.
                        </p>
                    </div>
                    {/* Testo per immagine destra */}
                    <div className={`absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-out ${activeImage === 'right' ? 'opacity-100' : 'opacity-0'}`}>
                        <p className={`text-center text-3xl font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>Matteo</p>
                        <p className={`text-center text-lg font-medium tracking-widest leading-10 px-16 transition-all duration-500 ease-out transform ${activeImage === 'right' ? 'translate-x-0' : 'translate-x-full'}`}>
                            Ad oggi contiamo su una squadra tra fotografi e videomaker, formata dai migliori collaboratori con cui abbiamo avuto il piacere di lavorare.
                        </p>
                    </div>
                </div>

                {/* Immagine Destra */}
                <div
                    className="relative transition-all duration-300"
                    onMouseEnter={() => setActiveImage('right')}
                    onMouseLeave={() => setActiveImage('')}
                >
                    <img
                        src='https://placehold.co/600x400'
                        alt="Immagine destra"
                        className="h-[600px] w-[400px] object-cover"
                    />
                </div>
            </div>
        </div>
    );
}

export default AboutUs;
