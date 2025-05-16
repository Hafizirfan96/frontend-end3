const Form = ({ onSubmit, className = "", mainClassName = "", children }) => {
  return (
    <div className={`mt-10 mb-5 ${mainClassName}`}>
      <form
        className={`flex flex-col space-y-20 ${className}`}
        onSubmit={onSubmit}
        onKeyDown={(event) => {
          if (event.key === "Enter") {
            event.preventDefault(); // Prevents Enter from submitting the form
          }
        }}
      >
        {children}
      </form>
    </div>
  );
};

export default Form;
