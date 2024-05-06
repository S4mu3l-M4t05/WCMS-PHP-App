<?php
class AboutManager extends DbConnect {
    public function getAboutData() {
        // Retrieve all about data from the database and return them as an array
        $query = $this->db->query('SELECT * FROM about');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateAboutData(About $about) {
        // Update the about data in the database using the About object
        $sectionTitle = $about->getSectionTitle();
        $sectionSubheader = $about->getSectionSubheader();
        $articleHeader = $about->getArticleHeader();
        $articleSubheader = $about->getArticleSubheader();
        $paragraph = $about->getParagraph();
        $listItem1Title = $about->getListItem1Title();
        $listItem1Text = $about->getListItem1Text();
        $listItem2Title = $about->getListItem2Title();
        $listItem2Text = $about->getListItem2Text();

        $query = "UPDATE about SET ";
        $setClauses = [];

        if (!empty($sectionTitle)) {
            $setClauses[] = "section_title = :sectionTitle";
        }
        if (!empty($sectionSubheader)) {
            $setClauses[] = "section_subheader = :sectionSubheader";
        }
        if (!empty($articleHeader)) {
            $setClauses[] = "article_header = :articleHeader";
        }
        if (!empty($articleSubheader)) {
            $setClauses[] = "article_subheader = :articleSubheader";
        }
        if (!empty($paragraph)) {
            $setClauses[] = "paragraph = :paragraph";
        }
        if (!empty($listItem1Title)) {
            $setClauses[] = "listitem1_title = :listItem1Title";
        }
        if (!empty($listItem1Text)) {
            $setClauses[] = "listitem1_text = :listItem1Text";
        }
        if (!empty($listItem2Title)) {
            $setClauses[] = "listitem2_title = :listItem2Title";
        }
        if (!empty($listItem2Text)) {
            $setClauses[] = "listitem2_text = :listItem2Text";
        }

        if (!empty($setClauses)) {
            $query .= implode(', ', $setClauses);
        }

        $stmt = $this->db->prepare($query);

        if (!empty($sectionTitle)) {
            $stmt->bindParam(':sectionTitle', $sectionTitle);
        }
        if (!empty($sectionSubheader)) {
            $stmt->bindParam(':sectionSubheader', $sectionSubheader);
        }
        if (!empty($articleHeader)) {
            $stmt->bindParam(':articleHeader', $articleHeader);
        }
        if (!empty($articleSubheader)) {
            $stmt->bindParam(':articleSubheader', $articleSubheader);
        }
        if (!empty($paragraph)) {
            $stmt->bindParam(':paragraph', $paragraph);
        }
        if (!empty($listItem1Title)) {
            $stmt->bindParam(':listItem1Title', $listItem1Title);
        }
        if (!empty($listItem1Text)) {
            $stmt->bindParam(':listItem1Text', $listItem1Text);
        }
        if (!empty($listItem2Title)) {
            $stmt->bindParam(':listItem2Title', $listItem2Title);
        }
        if (!empty($listItem2Text)) {
            $stmt->bindParam(':listItem2Text', $listItem2Text);
        }

        $result = $stmt->execute();

        return $result;
    }

    public function getAboutDataById($id) {
        $query = "SELECT * FROM about WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $aboutData = $stmt->fetch(PDO::FETCH_ASSOC);
        $aboutPage = new About($aboutData);
        return $aboutPage;
    }
}