import './loadingIndicator.css';
// @ts-ignore
import Logo from './loading.png';

const LoadingIndicator = () => {
    return (
        <>
            <div className="logo-container-1">
                <img src={Logo} alt="Logo" className="logo-1"/>
                <div className="logo-fill-1"></div>
            </div>
        </>
    )
}

export default LoadingIndicator;
