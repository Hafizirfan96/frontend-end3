const Th = ({ children,className="",...props }) => {
  return <th className={`text-nowrap px-5 py-7 text-xl h-text text-left  ${className} `} {...props}>{children}</th>;
};

export default Th;
