import './loadingIndicator.css';
import Logo from './loading.png';

const LoadingIndicator = () =>{

    return <>
        <div className="logo-container">
            <img src={Logo} alt="Logo" className="logo"/>
            <div className="logo-fill"></div>
        </div>
    </>
}

export default LoadingIndicator;
