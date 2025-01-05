import React, { useState } from 'react';

const Counter = () => {
    const [count, setCount] = useState(0);

    const increment = () => {
        setCount(count + 1);
    };

    return (
        <div style={{ textAlign: 'center', marginTop: '50px' }}>
            <h1>Counter: {count}</h1>
            <button onClick={increment} style={{ padding: '10px 20px', fontSize: '16px' }}>
                Increment
            </button>
        </div>
    );
};

export default Counter;
