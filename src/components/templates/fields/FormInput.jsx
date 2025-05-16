import FieldError from "./FieldError";

const FormInput = ({ form, name, onKeyDown, title, type, disabled = false, minDate = new Date().toISOString(),
  onChange, onBlur }) => {
  return (
    <>
      <div className="space-y-2 relative">
        <div className="relative border border-gray-400 dark:border-gray-600 rounded-lg">
          <label
            htmlFor="floating_outlined"
            className="absolute  f-bg -top-4 left-4 font-bold text-xl h-text px-2 "
          >
            {title}
          </label>
          <input
            {...form.register(name, { onChange: onChange, onBlur: onBlur })}
            type={type}
            min={minDate}
            disabled={disabled}
            onKeyDown={onKeyDown}
            id="floating_outlined"
            className={`w-full bg-transparent focus:outline-none p-5 text-xl font-normal  ${disabled && `cursor-not-allowed `
              }`}
            placeholder={`Enter ${title}`}
          />
        </div>
        <FieldError form={form} name={name} />
        
      </div>
    </>
  );
};

export default FormInput;
