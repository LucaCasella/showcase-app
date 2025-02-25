import React from 'react';
import {ChevronRight} from "lucide-react";

const CarouselItem = ({item, position}: {item: {title: string, text: string, image: string}, position: string}) => {
    // console.log(item);
    return (
        <div className={`item-carousel w-[800px] flex flex-col gap-4 border border-gray-300 ${position}`}>
            <div className="flex justify-between gap-4">
                <div className="w-1/2 flex items-center justify-end font-bold text-xl">
                    {item.title}<ChevronRight size={20} color='white' />
                </div>
                <div className="w-1/2"></div>
            </div>

            <div className="flex gap-4">
                <div className="w-1/2">
                    <img
                        src={item.image}
                        alt="image"
                        className="w-full h-[200px] object-cover border border-red-500"
                    />
                </div>
                <div className="w-1/2 text-sm flex items-center leading-6">
                    {item.text}
                </div>
            </div>
        </div>
    );
};

export default CarouselItem;
