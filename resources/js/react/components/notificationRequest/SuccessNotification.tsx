import React, {useEffect } from "react";
import './successNotification.css'
interface SuccessNotificationProps {
    message: string;
    onClose: () => void;
}

const SuccessNotification: React.FC<SuccessNotificationProps> = ({ message, onClose }) => {
    useEffect(() => {
        const timer = setTimeout(onClose, 3000);
        return () => clearTimeout(timer);
    }, [onClose]);

    return (
        <div className="container-message">
            <span>{message}</span>
            <button onClick={onClose} className="button-succes-notify">X</button>
        </div>
    );
};


export default SuccessNotification;
