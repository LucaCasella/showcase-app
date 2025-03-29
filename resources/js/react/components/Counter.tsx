import React, { useState } from 'react';

const Counter = () => {
    const [count, setCount] = useState<number>(0);

    const increment = () => {
        setCount(count + 1);
    };

    return (
        <div style={{ textAlign: 'center', marginTop: '50px', fontSize: '40px', background: '' }}>
            <h1 className="font-bold" >Counter: {count}</h1>
            <button className="font-bold" onClick={increment} style={{ padding: '10px 20px', fontSize: '16px' }}>
                Increment
            </button>
        </div>
    );
};

export default Counter;
