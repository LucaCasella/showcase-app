import React, { useEffect } from "react";
import './errorNotification.css';

interface ErrorNotificationProps {
    message: string;
    onClose: () => void;
}

const ErrorNotification: React.FC<ErrorNotificationProps> = ({ message, onClose }) => {
    useEffect(() => {
        const timer = setTimeout(onClose, 4000);
        return () => clearTimeout(timer);
    }, [onClose]);

    return (
        <div className="container-message-error">
            <span>{message}</span>
            <button onClick={onClose} className="button-error-notify">X</button>
        </div>
);
};

export default ErrorNotification;
