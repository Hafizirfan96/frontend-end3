import React from 'react';


const SvgMapComponent = ({ svgContent, onRegionClick }) => {
  const handleClick = (event) => {
    const target = event.target ;
    if (target && target.dataset.name) {
      onRegionClick?.(target.dataset.name);
    }
  };

  return (
    <div>
      <svg
        onClick={handleClick}
        dangerouslySetInnerHTML={{ __html: svgContent }}
        style={{ width: '100%', height: '500px' }}
      />
    </div>
  );
};

export default SvgMapComponent;
