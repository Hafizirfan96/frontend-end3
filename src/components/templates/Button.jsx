import { ImSpinner2 } from "react-icons/im";
const Button = ({
  children,
  type = "button",
  className = "",
  disabled = false,
  onClick,
  isPending = false
}) => {
  return (
    <button
      type={type}
      disabled={isPending ? isPending : disabled}
      onClick={onClick}
      className={` p-bg h-fit text-nowrap cursor-pointer text-xl font-bold px-10 py-6 rounded-lg disabled:bg-primary/60 disabled:cursor-not-allowed ${className}`}
    >
      {isPending ? (
        <span className="flex gap-x-2 items-center justify-center">
          <ImSpinner2 className="animate-spin" /> Loading...
        </span>
      ) : (
        children
      )}
    </button>
  );
};

export default Button;
