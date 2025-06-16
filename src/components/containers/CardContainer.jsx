

const CardContainer = ({ children, className = "" }) => {
  return (
    <div
      className={`overflow-x-auto p-10 f-bg rounded-xl shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] ${className}`}
    >
      {children}
    </div>
  );
};

export default CardContainer;
