import React from 'react';

export default function Posts(props){
    return(
        <div className="py-8 border-b-2 border-grey-lighter">
            <div className="flex items-center justify-between">
                <a href={'/post/' + props.id } className="text-2xl no-underline font-semibold text-blue-darker">
                    { props.title }
                </a>
            </div>
            <div className="text-grey-darker mt-4 text-sm">{ props.email }</div>
        </div>
    )
}
