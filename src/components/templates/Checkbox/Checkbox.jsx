const Checkbox = ({ checked = false, onChange }) => {
  return (
    <div className="cursor-pointer">
      <div
        className={`w-6 h-6 rounded-md flex items-center justify-center transition-all ${
          checked ? "bg-orange-500" : "border-2 border-gray-500"
        }`}
      >
        {checked && (
          <svg
            xmlns="http://www.w3.org/2000/svg"
            className="w-5 h-5 text-white"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fillRule="evenodd"
              d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"
              clipRule="evenodd"
            />
          </svg>
        )}
      </div>
    </div>
  );
};
export default Checkbox