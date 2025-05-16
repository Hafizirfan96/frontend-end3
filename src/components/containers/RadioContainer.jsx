const RadioContainer = ({ title = "", children }) => {
  return (
    <div className="space-y-5">
      <h4 className="font-bold text-xl h-text flex-wrap">{title}</h4>
      <div className="flex gap-16">{children}</div>
    </div>
  );
};

export default RadioContainer;
