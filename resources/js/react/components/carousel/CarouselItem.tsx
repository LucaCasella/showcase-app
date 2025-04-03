import React from 'react';
import {ChevronRight} from "lucide-react";

const CarouselItem = ({item, position}: { item: { title: string, text: string, image: string, link: string }, position: string }) => {
    return (
        <div className={`item-carousel w-[800px] flex flex-col gap-4 pr-4 bg-white ${position}`}>
            <a href={item.link} className='text-black no-underline'>
                <div className="flex justify-between gap-4 p-2">
                    <div className="w-1/2 flex items-center justify-end font-bold text-xl leading-none">
                        {item.title}<ChevronRight size={20} color='black'/>
                    </div>
                    <div className="w-1/2"></div>
                </div>

                <div className="flex gap-4">
                    <div className="w-1/2">
                        <img
                            src={item.image}
                            alt="image"
                            className="w-full h-full object-cover"
                        />
                    </div>
                    <div className="w-1/2 text-xl font-normal flex items-center leading-7 p-1">
                        {item.text}
                    </div>
                </div>
            </a>
        </div>
    );
};

export default CarouselItem;
