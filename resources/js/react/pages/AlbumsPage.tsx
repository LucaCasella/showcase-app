import React from 'react';

function AlbumsPage() {
    return (
        <div className='max-w-7xl mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8'>
            <AlbumItem title="John Doe e Amy White" location='La Nuova Rocca' />
            <AlbumItem title="John Doe e Amy White" location='Podere Calvanella' />
            <AlbumItem title="John Doe e Amy White" location='Oliveto sul Lago' />
            <AlbumItem title="John Doe e Amy White" location='Monte Battaglia' />
            <AlbumItem title="John Doe e Amy White" location='Monte Battaglia' />
            <AlbumItem title="John Doe e Amy White" location='Monte Battaglia ded d dwed ' />
            <AlbumItem title="John Doe e Amy White" location='Monte Battaglia' />
        </div>
    );
}

function AlbumItem({title, location}: any) {
    return (
        <div>
            <div className="relative overflow-hidden group mb-4">
                {/* Immagine con effetto zoom */}
                <img
                    className="w-full xl:h-72 object-cover group-hover:scale-125 transition-transform duration-500"
                    src='https://placehold.co/600x400'
                    alt={`Immagine ${title}`}
                    loading="lazy"
                />

                {/* Titolo - Nascosto di default, visibile in hover */}
                <div className="absolute inset-0 items-center justify-center hidden group-hover:flex duration-500">
                    <p className="text-2xl tracking-widest font-semibold">{title}</p>
                </div>
            </div>
            <div className='flex items-center gap-10 px-4'>
                <span className='w-full h-[1px] bg-gray-500'/>
                <div className='text-center text-nowrap'>
                    {location}
                </div>
                <span className='w-full h-[1px] bg-gray-500'/>
            </div>
        </div>
    );
}

export default AlbumsPage;
