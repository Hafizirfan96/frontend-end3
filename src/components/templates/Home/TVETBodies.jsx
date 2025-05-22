const TVETBodies = ({ title, bgColor, image, id ,onClick}) => {

 const handleClick = () => {
    if (onClick) {
      onClick();
    }
  };

  return (
    <div onClick={handleClick}
      id={id}
      className={` cursor-pointer w-36 h-36 rounded-md flex flex-col items-center justify-center  ${bgColor}`}
    >
      <img src={image} className="h-16 " alt={title} />
      <h3 className="text-white text-3xl font-semibold mt-5  leading-none">
        {title}
      </h3>
    </div>
  );
};

export default TVETBodies;
