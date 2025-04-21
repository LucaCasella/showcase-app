import React from 'react';
import './whatsapp.scss';
const WhatsappIcon = () => {
    return (
        <div className="whatsapp-link-container">
            <a href='https://api.whatsapp.com/send?phone=3803797287' className="a-tag-whatsapp" target="_blank">
                <img src={'/assets/Digital_Glyph_Green.png'} alt="whatsapp-icon" className="whatsapp-icon"/>
            </a>
        </div>
    );
};

export default WhatsappIcon;
