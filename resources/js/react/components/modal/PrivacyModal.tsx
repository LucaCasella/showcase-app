import React, {useContext} from 'react';
import {X} from "lucide-react";
import './privacy-modal.scss';
import {LanguageContext} from "../../language_context/LanguageProvider";

interface ModalProps {
    isOpen: any;
    onClose: any;
}

const PrivacyModal = ({isOpen, onClose}: ModalProps) => {
    const {languageData} = useContext(LanguageContext);

    if (!isOpen) {
        return null;
    }

    const handleBackdropClick = (e: any) => {
        if (e.target.classList.contains('modal-backdrop-1')) {
            onClose();
        }
        if (e.target.className === 'modal-backdrop') {
            onClose();
        }
    };

    return (
        <div className="modal-backdrop-1" onClick={handleBackdropClick}>
            <div className="modal-content-1 text-center"  onClick={(e) => e.stopPropagation()}>
                <button className="modal-close-1" onClick={onClose}><X/></button>
                <h4>{languageData.privacyModal.title}</h4>
                <p>{languageData.privacyModal.updatedAt}</p>
                <p>{languageData.privacyModal.intro}</p>
                <h6>{languageData.privacyModal.item1.title}</h6>
                <p>{languageData.privacyModal.item1.description}</p>
                <h6>{languageData.privacyModal.item2.title}</h6>
                <p>{languageData.privacyModal.item2.description}</p>
                <p>{languageData.privacyModal.item2.li1}</p>
                <p>{languageData.privacyModal.item2.li2}</p>
                <p>{languageData.privacyModal.item2.li3}</p>
                <p>{languageData.privacyModal.item2.li4}</p>
                <h6>{languageData.privacyModal.item3.title}</h6>
                <p>{languageData.privacyModal.item3.description}</p>
                <p>{languageData.privacyModal.item3.li1}</p>
                <p>{languageData.privacyModal.item3.li2}</p>
                <p>{languageData.privacyModal.item4.title}</p>
                <p>{languageData.privacyModal.item4.description}</p>
                <h6>{languageData.privacyModal.item5.title}</h6>
                <p>{languageData.privacyModal.item5.description1}</p>
                <p>{languageData.privacyModal.item5.li1}</p>
                <p>{languageData.privacyModal.item5.description2}</p>
                <h6>{languageData.privacyModal.item6.title}</h6>
                <p>{languageData.privacyModal.item6.description}</p>
                <h6>{languageData.privacyModal.item7.title}</h6>
                <p>{languageData.privacyModal.item7.description}</p>
                <p>{languageData.privacyModal.outro}</p>
                <p>Anastasia Kabakova</p>
            </div>
        </div>
    );
};

export default PrivacyModal;
