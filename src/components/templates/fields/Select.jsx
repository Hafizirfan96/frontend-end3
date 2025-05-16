import {
  bgSoft,
  bgElv,
  text1,
  text2,
  border
} from "../../../utils/themeColors";
import { motion } from "framer-motion";

const Select = ({
  title,
  register,
  options = [],
  disabled = false,
  errors,
  onChange,
  isPending = false,
  all = false,
  name = "",
  placeholder = true,
  placeholderText = ""
}) => {
  return (
    <div className="space-y-2 relative mb-5">
      {title && <label className={`font-bold text-sm ${text1}`}>{title}</label>}
      <select
        name={name}
        {...register}
        onChange={onChange}
        disabled={disabled}
        className={`rounded-md ${border} ${
          disabled ? bgElv : bgSoft
        } ${text1} capitalize text-sm w-full outline-none px-3 py-2.5 ${
          disabled && `cursor-not-allowed ${text2}`
        } `}
      >
        {placeholder && (
          <option value="">
            {isPending
              ? "Loading..."
              : placeholderText
              ? placeholderText
              : "-- Select --"}
          </option>
        )}
        {all && <option value="all">{isPending ? "Loading..." : "All"}</option>}
        {options.length &&
          options.map((option, i) => (
            <option className="" value={option.value} key={i}>
              {option?.title}
            </option>
          ))}
      </select>

      {register && register.name && errors && errors[register.name] && (
        <motion.p
          initial={{ opacity: 0, y: -10 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.2 }}
          className={`text-red-600  absolute -bottom-4  text-xs`}
        >
          {(errors[register.name] )?.message}
        </motion.p>
      )}
    </div>
  );
};

export default Select;
