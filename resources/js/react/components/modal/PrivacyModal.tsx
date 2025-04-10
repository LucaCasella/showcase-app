import React, {useContext} from 'react';
import {X} from "lucide-react";
import './privacy-modal.scss';
import {LanguageContext} from "../../language_context/LanguageProvider";

interface ModalProps {
    isOpen: any;
    onClose: any;
}

const PrivacyModal = ({isOpen, onClose}: ModalProps) => { //todo: adjust css
    const {languageData} = useContext(LanguageContext);

    if (!isOpen) {
        return null;
    }

    const handleBackdropClick = (e: any) => {
        if (e.target.className === 'modal-backdrop') {
            onClose();
        }
    };

    return (
        <div className="modal-backdrop" onClick={handleBackdropClick}>
            <div className="modal-content">
                <button className="modal-close" onClick={onClose}><X/></button>
                <p>{languageData.privacyModal.title}</p>
                <p>{languageData.privacyModal.updatedAt}</p>
                <p>{languageData.privacyModal.intro}</p>
                <p>{languageData.privacyModal.item1.title}</p>
                <p>{languageData.privacyModal.item1.description}</p>
                <p>{languageData.privacyModal.item2.title}</p>
                <p>{languageData.privacyModal.item2.description}</p>
                <p>{languageData.privacyModal.item2.li1}</p>
                <p>{languageData.privacyModal.item2.li2}</p>
                <p>{languageData.privacyModal.item2.li3}</p>
                <p>{languageData.privacyModal.item2.li4}</p>
                <p>{languageData.privacyModal.item3.title}</p>
                <p>{languageData.privacyModal.item3.description}</p>
                <p>{languageData.privacyModal.item3.li1}</p>
                <p>{languageData.privacyModal.item3.li2}</p>
                <p>{languageData.privacyModal.item4.title}</p>
                <p>{languageData.privacyModal.item4.description}</p>
                <p>{languageData.privacyModal.item5.title}</p>
                <p>{languageData.privacyModal.item5.description1}</p>
                <p>{languageData.privacyModal.item5.li1}</p>
                <p>{languageData.privacyModal.item5.li2}</p>
                <p>{languageData.privacyModal.item5.li3}</p>
                <p>{languageData.privacyModal.item5.li4}</p>
                <p>{languageData.privacyModal.item5.description2}</p>
                <p>{languageData.privacyModal.item6.title}</p>
                <p>{languageData.privacyModal.item6.description}</p>
                <p>{languageData.privacyModal.item7.title}</p>
                <p>{languageData.privacyModal.item7.description}</p>
                <p>{languageData.privacyModal.outro}</p>
                <p>Anastasia Kabakova</p>
            </div>
        </div>
    );
};

export default PrivacyModal;
