import { useEffect, useState } from "react";
import Button from "../Button";
import FieldError from "./FieldError";

const ComboBox = ({
  form,
  title,
  options = [],
  disabled = false,
  name = "",
  setIsAddNew,
  onChange,
  placeholder,
}) => {
  const [query, setQuery] = useState("");
  const [isOpen, setIsOpen] = useState(false);
  const [filteredOptions, setFilteredOptions] = useState(options);

  useEffect(() => {
    setFilteredOptions(options);
  }, [options]);

  useEffect(() => {
    const check = setTimeout(() => {
      setQuery(form.getValues(name));
    }, 1000);

    return () => clearTimeout(check);
  }, [form, name]);

  const onChangeHandler = (values) => {
    onChange && onChange(values);
    form.setValue(name + "title", values.title);
    form.setValue(name, values.value);
    setQuery(values.title);
    setIsOpen(false);
    setIsAddNew && setIsAddNew(false);
  };

  return (
    <div className="space-y-2 relative">
      <div className="relative border border-gray-400 dark:border-gray-600 rounded-lg">
        <label
          htmlFor="floating_outlined"
          className="absolute f-bg -top-4 left-4 font-bold text-xl h-text px-2"
        >
          {title}
        </label>
        <input
          name={name}
          {...form.register(name, {
            onChange: (e) => {
              setIsOpen(true);
              setQuery(e.target.value);
              form.setValue(name, e.target.value);
              form.setValue(name + "title", e.target.value);

              const filtered = options?.filter((option) =>
                option?.title?.toLowerCase().includes(e.target.value?.toLowerCase())
              );
              setFilteredOptions(filtered);
            },
            onBlur: () => {
              const find = options.find((x) => x.title === form.getValues(name));
              if (form.getValues(name) === "") {
                setQuery("");
              } else if (!find) {
                setQuery(form.getValues(name));
              }
              setTimeout(() => setIsOpen(false), 100);
            },
          })}
          type="text"
          disabled={disabled}
          className={`rounded-md w-full bg-transparent focus:outline-none p-5 text-xl font-normal outline-none ${
            disabled && `cursor-not-allowed`
          }`}
          style={{ textTransform: "capitalize" }}
          placeholder={title && `${placeholder ? placeholder : "Select"} ${title?.toLowerCase()}`}
          value={query}
          onFocus={() => setIsOpen(true)}
        />

        {isOpen && (
          <div className="z-50 absolute mt-1 w-full f-bg border border-gray-300 rounded-md shadow-lg max-h-60 overflow-y-auto">
            {filteredOptions.length > 0 ? (
              filteredOptions.map((option, index) => (
                <div
                  key={index}
                  className="hover:bg-gray-100 hover:dark:bg-gray-700 px-3 py-2 cursor-pointer text-lg text-left"
                  onClick={() =>
                    onChangeHandler({
                      value: option?.value,
                      title: option?.title,
                    })
                  }
                >
                  {option?.title}
                </div>
              ))
            ) : (
              <div className="px-3 py-2 text-gray-500 text-lg">No options found</div>
            )}
            {setIsAddNew && (
              <div
                key={"109x"}
                className="hover:bg-gray-100 px-3 py-2 cursor-pointer text-lg"
              >
                <Button
                  onClick={() => {
                    setIsAddNew(true);
                    form.setValue(name, "");
                    form.setValue(name + "title", "");
                    setQuery("");
                  }}
                  className="text-sm !font-normal !py-0 !px-1 !rounded-none"
                >
                  Add New
                </Button>
              </div>
            )}
          </div>
        )}
      </div>
      <FieldError name={name} form={form} />
    </div>
  );
};

export default ComboBox;