import { useMemo } from "react";
import { SERVER_PATH_WITHOUT_API } from "../../../config";
import PdfPreview from "../PdfPreview";
import Modal from "./Modal";

const MediaModal = ({ modalToggle, setModalToggle, media = [] }) => {
  const totalCost = useMemo(() => {
    return media.reduce((prev, curr) => prev + curr?.cost, 0)
  }, [media])
  

  return (
    <Modal
      title="Job Media "
      isVisible={modalToggle}
      onClickFn={() => setModalToggle(false)}
    >
      <div className="flex justify-end gap-2 items-center text-2xl font-semibold"><span className="">Printig Cost:</span> <span className="text-3xl p-text">{totalCost?.toFixed(2)}¢</span> </div>
      <hr />
      <div className="grid grid-cols-2 gap-5">
        {Array.isArray(media) &&
          media.map((item) => {
            return !item?.document ? null : item?.document.includes(".pdf") ? (
              <>
                {/* <embed
                  id="pdfEmbed"
                  src={`${SERVER_PATH_WITHOUT_API}${item?.document}`}
                  type="application/pdf"
                  width="100%"
                  height="100%"
                  style={{ border: "none" }}
                  allow="fullscreen"
                /> */}
                <PdfPreview key={item?._id} url={`${SERVER_PATH_WITHOUT_API}${item?.document}`} />
              </>
            ) : (
              <div key={item?._id} className="relative h-100 w-100">
                <img
                  src={`${SERVER_PATH_WITHOUT_API}${item?.document}`}
                  alt={item.name}
                  className="h-full w-full object-cover"
                />
              </div>
            );
          })}
      </div>
    </Modal>
  );
};

export default MediaModal;
