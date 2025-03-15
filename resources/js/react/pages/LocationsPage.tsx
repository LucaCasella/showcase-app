import React from 'react';

function LocationsPage() {
    return (
        <div className='w-4/5 lg:3/4 mx-auto grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16'>
            <LocationItem title="John Doe e Amy White" location='La Nuova Rocca' />
            <LocationItem title="John Doe e Amy White" location='Podere Calvanella' />
            <LocationItem title="John Doe e Amy White" location='Oliveto sul Lago' />
            <LocationItem title="John Doe e Amy White" location='Monte Battaglia' />
            <LocationItem title="John Doe e Amy White" location='Monte Battaglia' />
            <LocationItem title="John Doe e Amy White" location='Monte Battaglia ded d dwed ' />
            <LocationItem title="John Doe e Amy White" location='Monte Battaglia' />
        </div>
    );
}

function LocationItem({title, location}: any) {
    return (
        <div>
            <div className="relative overflow-hidden group mb-4">
                {/* Immagine con effetto zoom */}
                <img
                    className="w-full xl:h-72 2xl:h-96 object-cover group-hover:scale-125 transition-transform duration-500"
                    src='https://placehold.co/600x400'
                    alt={`Immagine ${title}`}
                    loading="lazy"
                />

                {/* Titolo - Nascosto di default, visibile in hover */}
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="text-3xl tracking-widest font-bold">{title}</p>
                </div>
            </div>
            <div className='flex items-center gap-10 px-4'>
                <span className='w-full bg-gray-500 h-[1px]'/>
                <div className='text-center text-nowrap'>
                    {location}
                </div>
                <span className='w-full bg-gray-500 h-[1px]'/>
            </div>
        </div>
    );
}

export default LocationsPage;
