<?php
class HomeManager extends DbConnect {
    public function getHomeData() {
        // Retrieve all home data from the database and return them as an array
        $query = $this->db->query('SELECT * FROM home');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateSettings(Home $home) {
        $newHeading = $home->getHeading();
        $newSubheading = $home->getSubheading();
        $newBtnText = $home->getBtnText();
        $newBtnLink = $home->getBtnLink();
        $newVideo = $home->getVideo();
        $newVideoText = $home->getVideoText();
        $newBgdImage = $home->getBgdImage();
        $newFooter = $home->getFooter();

        $query = "UPDATE home SET ";

        $setClauses = [];
        if (!empty($newHeading)) {
            $setClauses[] = "heading = :newHeading";
        }
        if (!empty($newSubheading)) {
            $setClauses[] = "subheading = :newSubheading";
        }
        if (!empty($newBtnText)) {
            $setClauses[] = "btnText = :newBtnText";
        }
        if (!empty($newBtnLink)) {
            $setClauses[] = "btnLink = :newBtnLink";
        }
        if (!empty($newVideo)) {
            $setClauses[] = "video = :newVideo";
        }
        if (!empty($newVideoText)) {
            $setClauses[] = "videoText = :newVideoText";
        }
        if (!empty($newBgdImage)) {
            $setClauses[] = "bgd_image = :newBgdImage";
        }
        if (!empty($newFooter)) {
            $setClauses[] = "footer = :newFooter";
        }

        if (!empty($setClauses)) {
            $query .= implode(', ', $setClauses);
        }

        $stmt = $this->db->prepare($query);

        if (!empty($newHeading)) {
            $stmt->bindParam(':newHeading', $newHeading);
        }
        if (!empty($newSubheading)) {
            $stmt->bindParam(':newSubheading', $newSubheading);
        }
        if (!empty($newBtnText)) {
            $stmt->bindParam(':newBtnText', $newBtnText);
        }
        if (!empty($newBtnLink)) {
            $stmt->bindParam(':newBtnLink', $newBtnLink);
        }
        if (!empty($newVideo)) {
            $stmt->bindParam(':newVideo', $newVideo);
        }
        if (!empty($newVideoText)) {
            $stmt->bindParam(':newVideoText', $newVideoText);
        }
        if (!empty($newBgdImage)) {
            $stmt->bindParam(':newBgdImage', $newBgdImage);
        }
        if (!empty($newFooter)) {
            $stmt->bindParam(':newFooter', $newFooter);
        }

        $result = $stmt->execute();

        return $result;
    }



    public function getHomeDataById($id) {
        $query = "SELECT * FROM home WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $homeData = $stmt->fetch(PDO::FETCH_ASSOC);
        $homePage = new Home($homeData);
        return $homePage;
    }


}