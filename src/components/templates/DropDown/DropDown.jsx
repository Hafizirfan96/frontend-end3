import { useState } from "react";
import FieldError from "../fields/FieldError";

const DropDown = ({
  form,
  name,
  title,
  cities,
  label = "Select City / Region",
  className = "",
  disabled = false,
  onChange,
  onBlur,
}) => {
  const [isOpen, setIsOpen] = useState(false);
  const [selectedCity, setSelectedCity] = useState("");

  const handleSelect = (cityTitle) => {
    setSelectedCity(cityTitle);
    setIsOpen(false);
    if (form && form.setValue) {
      form.setValue(name, cityTitle, { shouldValidate: true });
    }
    if (onChange) onChange(cityTitle);
  };

  return (
    <div className="space-y-2 relative">
      {title && <label className="font-bold text-xl h-text">{title}</label>}

      <div className="relative rounded-lg b-bg">
        <button
          type="button"
          disabled={disabled}
          onClick={() => setIsOpen(!isOpen)}
          className={`${
            disabled ? "cursor-not-allowed text-gray-400" : ""
          } flex justify-between items-center w-full text-xl font-normal outline-none p-5 bg-transparent rounded-lg ${className}`}
        >
          <span
            className={`${
              selectedCity ? "text-black" : "text-gray-400"
            } text-left`}
          >
            {selectedCity || label}
          </span>
          <svg
            className={`w-5 h-5 transform transition-transform ${
              isOpen ? "rotate-180" : "rotate-0"
            } text-gray-400`}
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
          >
            <path
              stroke="currentColor"
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
              d="m1 1 4 4 4-4"
            />
          </svg>
        </button>

        {isOpen && (
          <div className="absolute top-full left-0 w-full bg-white divide-y divide-gray-100 rounded-lg shadow-lg mt-2 z-10">
            <ul className="py-2 text-sm text-gray-700 text-left max-h-60 overflow-y-auto">
              {cities?.map((city) => (
                <li key={city._id}>
                  <button
                    className="block w-full text-left px-4 py-2 hover:bg-gray-100 text-[14px]"
                    onClick={() => handleSelect(city.title)}
                  >
                    {city.title}
                  </button>
                </li>
              ))}
            </ul>
          </div>
        )}
      </div>

      {form && name && <FieldError form={form} name={name} />}
    </div>
  );
};

export default DropDown;
