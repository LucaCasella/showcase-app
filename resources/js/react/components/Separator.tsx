import React from 'react';

const Separator = () => {
    return (
        <div className='flex items-center gap-10 px-4'>
            <span className='w-full h-[1px] bg-gray-500'/>
            <img src='/assets/new/logoNoBG.png' alt='AK logo' className='w-10 h-8 md:w-20 md:h-16'/>
            <span className='w-full h-[1px] bg-gray-500'/>
        </div>
    );
};

export default Separator;
