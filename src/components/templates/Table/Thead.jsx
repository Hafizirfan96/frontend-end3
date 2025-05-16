const Thead = ({ children,className }) => {
  return (
    <thead className={`border-b dark:border-cs-light bg-gray-50 dark:bg-gray-800 ${className}`}>
      {children}
    </thead>
  );
};

export default Thead;
