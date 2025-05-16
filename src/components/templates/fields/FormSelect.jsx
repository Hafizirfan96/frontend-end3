import FieldError from "./FieldError"


const FormSelect = ({
  form,
  title,
  options = [],
  disabled = false,
  isPending = false,
  all = false,
  name = "",
  placeholder = true,
  placeholderText = "",
  onChange,
  onBlur,
  labelClassName
}) => {
  return (
    <div className="space-y-2 relative ">
      <div className="relative border border-gray-400 dark:border-gray-600 rounded-lg">
        <label
          htmlFor="floating_outlined"
          className={`absolute  f-bg -top-4 left-4 font-bold text-xl h-text px-2 ${labelClassName}`}
        >
          {title}
        </label>
        <select
          name={name}
          {...form.register(name, { onChange: onChange, onBlur: onBlur })}
          disabled={disabled}
          className={`rounded-md  w-full bg-transparent focus:outline-none capitalize p-5 text-xl font-normal 
            outline-none  ${disabled && `cursor-not-allowed`} `}
        >
          {placeholder && (
            <option className="b-bg" value="">
              {isPending
                ? "Loading..."
                : placeholderText
                  ? placeholderText
                  : "-- Select --"}
            </option>
          )}
          {all && (
            <option className="b-bg" value="all">{isPending ? "Loading..." : "All"}</option>
          )}
          {options.length &&
            options.map((option, i) => (
              <option className="b-bg" value={option.value} key={i}>
                {option?.title}
              </option>
            ))}
        </select>
      </div>
      {form.register && name && form.formState.errors && (
       <FieldError form={form} name={name}/>
      )}
    </div>
  );
};

export default FormSelect;
