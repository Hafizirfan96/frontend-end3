import {  useEffect, useRef } from 'react';

 const OutSideClicker=({onClickOutside,show})=> {
  const ref= useRef<HTMLDivElement | null>(null);
  

  
  useEffect(() => {
    const handleClickOutside = (event) => {
      if (ref.current && !ref.current.contains(event.target)) {
        onClickOutside && onClickOutside();
      }
    };
    document.addEventListener('click', handleClickOutside, true);
    return () => {
      document.removeEventListener('click', handleClickOutside, true);
    };
  }, [ onClickOutside ]);

  if(!show)
    return null;

  return (
    <div ref={ref}>
    </div> );
}

export default OutSideClicker