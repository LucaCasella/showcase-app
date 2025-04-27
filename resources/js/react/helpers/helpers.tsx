import React from "react";

export default function splitTextBySentences(text: string) {
    return text.split('.').map((part, index) => (
        part.trim() && (
            <React.Fragment key={index}>
                {part.trim() + '.'}
                <br/>
            </React.Fragment>
        )
    ));
}
