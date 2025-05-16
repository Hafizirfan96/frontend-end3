const Td = ({ children, className="", ...prop }) => {
  return (
    <td
      {...prop}
      className={`whitespace-nowrap px-5 py-7 text-xl  ${className}`}
    >
      {children}
    </td>
  );
};

export default Td;
