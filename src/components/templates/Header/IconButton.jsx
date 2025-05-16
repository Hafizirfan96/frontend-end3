const IconButton = ({ children, onClick, className }) => {
  return (
    <button
      onClick={onClick}
      className={`p-2 bg-gray-300 rounded-full ${className}`}
    >
      {children}
    </button>
  );
};
export default IconButton;
