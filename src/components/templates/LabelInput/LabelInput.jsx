const LabelInput = ({ id,
  label,
  defaultValue = "",
  disabled = false,
  className = ""

}) => {
  return (
    <div className={`relative ${className} w-[350px]`}>
      <input
        id={id}
        type="text"
        defaultValue={defaultValue}
        disabled={disabled}
        className="text-[14px] peer w-full border border-cs-border-color rounded-xl px-7 pt-6 pb-6  focus:ring-cs-border-color focus:outline-none disabled:bg-gray-100"
        placeholder=" "
      />
      <label
        htmlFor={id}
        className="absolute left-7 top-1/2 transform -translate-y-1/2 text-gray-500 text-base bg-white px-3 transition-all
      peer-focus:top-1 peer-focus:text-[14px] peer-focus:text-cs-secondary
      peer-[:not(:placeholder-shown)]:top-[-1px] peer-[:not(:placeholder-shown)]:text-[14px] peer-[:not(:placeholder-shown)]:text-cs-secondary"
      >
        {label}
      </label>
    </div>
  );
};

export default LabelInput;
