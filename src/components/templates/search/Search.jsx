import { bgElv, text2 } from "../../../utils/themeColors";
import { FaSearch } from "react-icons/fa";

const Search = () => {
  return (
    <div className={`relative md:w-96 rounded-md`}>
      <input
        type="text"
        placeholder="Search..."
        className={`rounded-md ${bgElv} text-sm w-full outline-none px-3 py-2.5 password pl-10  `}
      />

      <span
        className={`absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer ${text2}`}
      >
        <FaSearch />
      </span>
    </div>
  );
};

export default Search;
