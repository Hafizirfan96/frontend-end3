import { useCallback } from "react";

const buttonCss = `py-3 px-5 n-text flex justify-center items-center  shadow-md rounded b-bg cursor-pointer`;
const activeButtonCss = `py-3 px-5 n-text flex justify-center items-center  shadow-md rounded p-bg text-white cursor-not-allowed`;

const Pagination = ({ page, totalPages, setQueryParams, queryParams }) => {
  const renderDots = useCallback(
    (currentPage) => {
      const pages = totalPages;
      const pageNos = [];

      for (let i = 1; i <= pages; i++) {
        if (
          1 === parseInt(i) ||
          parseInt(i) === parseInt(totalPages) ||
          (i >= parseInt(currentPage) - 1 && i <= parseInt(currentPage) + 1)
        )
          pageNos.push(i);
        if (i === parseInt(currentPage) - 2 || i === parseInt(currentPage) + 2)
          pageNos.push("...");
      }

      const pageComp = pageNos.map((p, i) => {
        return typeof p === "number" ? (
          <li
            role="button"
            key={i}
            className={`${
              parseInt(currentPage) === parseInt(p)
                ?activeButtonCss
                :buttonCss 
            } `}
            onClick={() =>
              setQueryParams((prev) => {
                return { ...prev, currentPage: p };
              })
            }
          >
            {p}
          </li>
        ) : (
          <span key={i} className={` h-text text-2xl`}>
            {p}
          </span>
        );
      });
      return <div className="flex gap-1 items-end">{pageComp}</div>;
    },
    [totalPages, setQueryParams]
  );

  return (
    <>
      <div className="flex justify-between">
        <div className="flex items-center gap-2">
          <span className="text-lg font-bold">Show</span>{" "}
          <select
            value={queryParams.perPage}
            onChange={(e) => {
              setQueryParams((prev) => {
                return { ...prev, perPage: e.target.value, currentPage: 1 };
              });
            }}
            className="shadow-md py-2 focus:outline-none text-xl b-bg"
          >
            {[10, 20, 30, 50, 100].map((n) => (
              <option key={n} value={n} className="text-xl">
                {n}
              </option>
            ))}
          </select>
        </div>
        <ul className="flex gap-1 items-end text-xl">
          {
            <li
              role="button"
              className={`${
                1 === parseInt(page) ? "cursor-not-allowed" : "cursor-pointer"
              } ${buttonCss}`}
              onClick={() => {
                if (page > 1)
                  setQueryParams((prev) => {
                    return { ...prev, currentPage: parseInt(page) - 1 };
                  });
              }}
            >
              &lt;
            </li>
          }
          {renderDots(page)}
          {
            <li
              role="button"
              className={`${
                parseInt(totalPages) === parseInt(page)
                  ? "cursor-not-allowed"
                  : "cursor-pointer"
              }  ${buttonCss}`}
              onClick={() => {
                if (totalPages > page)
                  setQueryParams((prev) => {
                    return { ...prev, currentPage: parseInt(page) + 1 };
                  });
              }}
            >
              &gt;
            </li>
          }
        </ul>
      </div>
    </>
  );
};

export default Pagination;
