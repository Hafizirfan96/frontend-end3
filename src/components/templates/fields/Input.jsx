import { useState } from "react";
import FieldError from "./FieldError";
import { FaEye, FaEyeSlash } from "react-icons/fa6";

const Input = ({
  form,
  title,
  name,
  icon,
  type,
  disabled = false,
  onChange,
  onBlur,
}) => {
  const [isShowPassword, setIsShowPassword] = useState(false);

  return (
    <div className="space-y-2 relative">
      {title && <label className={`font-bold text-xl h-text `}>{title}</label>}
      <div className={`relative rounded-lg b-bg `}>
        {icon ? (
          <span
            className={`text-2xl absolute text-gray-400 left-6 top-1/2 -translate-y-1/2 cursor-pointer `}
            onClick={() => setIsShowPassword((prev) => !prev)}
          >
            {icon}
          </span>
        ) : null}
        <input
          {...form.register(name, { onChange: onChange, onBlur: onBlur })}
          type={
            type === "password" ? (isShowPassword ? "text" : "password") : type
          }
          disabled={disabled}
          placeholder={title && `Enter ${title.toLowerCase()}`}
          className={`${icon ? "pl-16" : ""} rounded-lg bg-transparent ${
            disabled ? "" : ""
          } text-xl font-normal  w-full outline-none p-5 ${
            type === "password" ? " pr-10" : ""
          } ${disabled && `cursor-not-allowed `} `}
        />
        {type === "password" && (
          <span
            className={`text-2xl absolute text-gray-400 right-5 top-1/2 -translate-y-1/2 cursor-pointer `}
            onClick={() => setIsShowPassword((prev) => !prev)}
          >
            {isShowPassword ? <FaEye /> : <FaEyeSlash />}
          </span>
        )}
      </div>

      <FieldError form={form} name={name} />
    </div>
  );
};

export default Input;
