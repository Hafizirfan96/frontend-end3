import { useMemo } from "react";

const useOptions = (data, option={ value:"", title:"" }) => {
  return useMemo(() => {
    if (Array.isArray(data)) {
      return (data ?? [])?.map((x) => {
        return { value: x[option.value], title: x[option.title] };
      });
    }
    if (typeof data === "object") {
      const list = [];
      Object.keys(data).forEach((key) => {
        list.push({ value: key, title: data[key] });
      });
      return list;
    }
  }, [data, option]);
};

export default useOptions;
