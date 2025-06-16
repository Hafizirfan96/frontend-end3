const Tooltip = ({ message, children, disabled = false, className = "" ,parentClass=""}) => {
  return (
    <div className={`flex group relative z-40 w-full ${parentClass}`}>
      {children}
      <span
        className={`${
          disabled ? "hidden" : "block"
        }  white z-40 absolute  w-fit  -top-10 right-[50%]  scale-0 transition-all font-bold text-nowrap  bg-cs-primary px-3 py-4 rounded-lg text-xl text-cs-black group-hover:scale-100 shadow-[0_0_5px_2px_rgba(0,0,0,0.2)] ${className}`}
      >
        {message}
      </span>
    </div>
  );
};

export default Tooltip;
