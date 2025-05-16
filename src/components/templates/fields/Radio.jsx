const Radio = ({
  title,
  disabled,
  containerClass = "",
  inputClass = "",
  labelClass = "",
  register,
  value
}) => {
  return (
    <div className={`flex items-center gap-1 lg:gap-2  ${containerClass} `}>
      <input
        disabled={disabled}
        id={title}
        {...register}
        type="radio"
        className={`cursor-pointer disabled:cursor-not-allowed ${inputClass}`}
        value={value}
        defaultChecked={value == 1}
      />
      <label
        htmlFor={title}
        className={` text-xl h-text cursor-pointer ${labelClass}`}
      >
        {title}
      </label>
    </div>
  );
};

export default Radio;
