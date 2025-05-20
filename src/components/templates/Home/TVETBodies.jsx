const TVETBodies = ({ title, bgColor, image, id }) => {
  return (
    <div
      id={id}
      className={`w-44 h-44 rounded-md flex flex-col items-center justify-center mt-10 ${bgColor}`}
    >
      <img src={image} className="h-16 m-0 p-0" alt={title} />
      <h3 className="text-white text-3xl font-semibold m-0 p-0 leading-none">
        {title}
      </h3>
    </div>
  );
};

export default TVETBodies;
